import 'dart:convert';
import 'dart:math';

import 'package:app/widgets/persons_list.dart';
import 'package:flutter/material.dart';
import 'package:app/models/patient_model.dart';
import 'package:app/models/data.dart';
import 'package:app/theme/extention.dart';
import 'package:app/theme/light_color.dart';
import 'package:app/theme/text_styles.dart';
import 'package:app/theme/theme.dart';
import 'package:app/commons/custom_bottom_bar.dart';
import 'package:app/commons/custom_app_bar.dart';
import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:http/http.dart' as http;

class PatientsScreen extends StatefulWidget {
  @override
  _PatientsScreenState createState() => _PatientsScreenState();
}

class _PatientsScreenState extends State<PatientsScreen> {
  List<PatientModel> patients = [];

  Future<List<PatientModel>> getPatients() async {
    print('entrei');

    http.Response response = await http.get(
        Uri.parse(Uri.encodeFull("http://127.0.0.1:8000")),
        headers: <String, String>{
          'Content-Type': 'application/json; charset=UTF-8',
          'Accept': "*/*",
          'connection': 'keep-alive',
          'Accept-Encoding': 'gzip, deflate, br',
        });

    print(response);

    if (response.statusCode == 200) {
      this.setState(() {
        var list = jsonDecode(response.body);

        print(list);
      });
    } else {
      throw Exception('Failed to load album: ' + response.body);
    }
  }

  @override
  void initState() {
    super.initState();
    print('init');
    this.getPatients();
    print('FIM');
    print(patients);
  }

  Widget _searchField() {
    return Container(
      height: 55,
      margin: EdgeInsets.symmetric(horizontal: 5, vertical: 10),
      width: MediaQuery.of(context).size.width,
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.all(Radius.circular(13)),
        boxShadow: <BoxShadow>[
          BoxShadow(
            color: LightColor.grey.withOpacity(.3),
            blurRadius: 15,
            offset: Offset(5, 5),
          )
        ],
      ),
      child: TextField(
        decoration: InputDecoration(
          contentPadding: EdgeInsets.symmetric(horizontal: 16, vertical: 16),
          border: InputBorder.none,
          hintText: "Pesquisar",
          hintStyle: TextStyles.body.subTitleColor,
          suffixIcon: SizedBox(
              width: 50,
              child: Icon(Icons.search, color: LightColor.lightBlue)
                  .alignCenter
                  .ripple(() {}, borderRadius: BorderRadius.circular(13))),
        ),
      ),
    );
  }

  Widget _doctorsList() {
    return SliverList(
      delegate: SliverChildListDelegate(
        [
          Column(mainAxisSize: MainAxisSize.min, children: [
            Container(
              width: double.infinity,
              padding: EdgeInsets.symmetric(horizontal: 5),
              child: ElevatedButton.icon(
                  onPressed: () {
                    print('adicionar');
                  },
                  icon: Icon(Icons.add),
                  label: Text('ADICIONAR'),
                  style: ButtonStyle()),
            ),
          ]),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: <Widget>[
              Text("Últimos Registos", style: TextStyles.title.bold),
              IconButton(
                      icon: Icon(
                        Icons.sort,
                        color: Theme.of(context).primaryColor,
                      ),
                      onPressed: () {})
                  .p(12)
                  .ripple(() {},
                      borderRadius: BorderRadius.all(Radius.circular(20))),
            ],
          ).hP16,
          new Container(
              constraints:
                  BoxConstraints(minWidth: double.infinity, maxHeight: 400),
              child: (patients.length > 0)
                  ? new ListView.builder(
                      itemBuilder: (ctx, i) {
                        return PatientTile(patients[i]);
                      },
                      itemCount: patients.length)
                  : new Card(
                      color: Colors.red.shade50,
                      child: Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Text('Não existem registos.',
                            textAlign: TextAlign.center),
                      )))
        ],
      ),
    );
  }

  Widget PatientsList() {
    List<PatientModel> patients = [];

    return Expanded(
      child: Container(
        child: ListView.builder(
            itemBuilder: (ctx, i) {
              print(patients[i]);
            },
            itemCount: patients.length),
      ),
    );
  }

  Widget PatientTile(PatientModel model) {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 8, horizontal: 16),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.all(Radius.circular(20)),
        boxShadow: <BoxShadow>[
          BoxShadow(
            offset: Offset(4, 4),
            blurRadius: 10,
            color: LightColor.grey.withOpacity(.2),
          ),
          BoxShadow(
            offset: Offset(-3, 0),
            blurRadius: 15,
            color: LightColor.grey.withOpacity(.1),
          )
        ],
      ),
      child: Container(
        padding: EdgeInsets.symmetric(horizontal: 18, vertical: 8),
        child: ListTile(
          contentPadding: EdgeInsets.all(0),
          leading: ClipRRect(
            borderRadius: BorderRadius.all(Radius.circular(13)),
            child: Container(
              height: 55,
              width: 55,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(15),
                color: randomColor(),
              ),
              child: Image.asset(
                model.image,
                height: 50,
                width: 50,
                fit: BoxFit.cover,
              ),
            ),
          ),
          title: Text(model.name, style: TextStyles.title.bold),
          subtitle: Text(
            model.type,
            style: TextStyles.bodySm.subTitleColor.bold,
          ),
          trailing: Icon(
            Icons.keyboard_arrow_right,
            size: 30,
            color: Theme.of(context).primaryColor,
          ),
        ),
      ).ripple(() {
        Navigator.pushNamed(context, "/DetailPage", arguments: model);
      }, borderRadius: BorderRadius.all(Radius.circular(20))),
    );
  }

  Color randomColor() {
    var random = Random();
    final colorList = [
      Theme.of(context).primaryColor,
      LightColor.orange,
      LightColor.green,
      LightColor.grey,
      LightColor.lightOrange,
      LightColor.skyBlue,
      LightColor.titleTextColor,
      Colors.red,
      Colors.brown,
      LightColor.purpleExtraLight,
      LightColor.skyBlue,
    ];
    var color = colorList[random.nextInt(colorList.length)];
    return color;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 1),
      backgroundColor: Colors.white,
      body: CustomScrollView(
        slivers: <Widget>[
          SliverList(
            delegate: SliverChildListDelegate(
              [
                _searchField(),
              ],
            ),
          ),
          _doctorsList()
        ],
      ),
      bottomNavigationBar: CustomBottomBar(index: 1),
    );
  }
}
