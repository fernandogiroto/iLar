import 'dart:convert';

import 'package:app/views/widgets/search-field-widget.dart';
import 'package:app/views/widgets/users-list-widget.dart';
import 'package:flutter/material.dart';
import 'package:app/models/patient_model.dart';
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

  Future<void> getPatients() async {
    print('entrei');

    http.Response response = await http.get(
        Uri.parse(Uri.encodeFull("http://127.0.0.1:8000/api/patients")),
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
                SearchField(context),
              ],
            ),
          ),
          UsersList({context: context, patients: patients})
        ],
      ),
      bottomNavigationBar: CustomBottomBar(index: 1),
    );
  }
}
