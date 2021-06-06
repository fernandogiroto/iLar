import 'package:flutter/material.dart';
import 'package:app/theme/light_color.dart';
import 'package:app/models/patient_model.dart';
import 'package:app/theme/text_styles.dart';
import 'package:app/theme/theme.dart';
import 'package:app/theme/extention.dart';
import 'package:app/widgets/progress_widget.dart';

class DetailPage extends StatefulWidget {
  DetailPage({Key key, this.model}) : super(key: key);
  final PatientModel model;

  @override
  _DetailPageState createState() => _DetailPageState();
}

class _DetailPageState extends State<DetailPage> {
  PatientModel model;
  @override
  void initState() {
    model = widget.model;
    super.initState();
  }

  Widget _appbar() {
    return Row(
      mainAxisAlignment: MainAxisAlignment.spaceBetween,
      children: <Widget>[
        BackButton(color: Theme.of(context).primaryColor),
        IconButton(
            icon: Icon(
              model.isfavourite ? Icons.favorite : Icons.favorite_border,
              color: model.isfavourite ? Colors.red : LightColor.grey,
            ),
            onPressed: () {
              setState(() {
                model.isfavourite = !model.isfavourite;
              });
            })
      ],
    );
  }

  @override
  Widget build(BuildContext context) {
    TextStyle titleStyle = TextStyles.title.copyWith(fontSize: 25).bold;
    if (AppTheme.fullWidth(context) < 393) {
      titleStyle = TextStyles.title.copyWith(fontSize: 23).bold;
    }
    return Scaffold(
      backgroundColor: LightColor.extraLightBlue,
      body: SafeArea(
        bottom: false,
        child: Stack(
          children: <Widget>[
            Image.asset(
              model.image,
              height: 400,
              fit: BoxFit.cover,
            ),
            DraggableScrollableSheet(
              maxChildSize: .8,
              initialChildSize: .6,
              minChildSize: .6,
              builder: (context, scrollController) {
                return Container(
                  height: AppTheme.fullHeight(context) * .5,
                  padding: EdgeInsets.only(
                      left: 19,
                      right: 19,
                      top: 16), //symmetric(horizontal: 19, vertical: 16),
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.only(
                        topLeft: Radius.circular(30),
                        topRight: Radius.circular(30)),
                    color: Colors.white,
                  ),
                  child: SingleChildScrollView(
                    physics: BouncingScrollPhysics(),
                    controller: scrollController,
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        ListTile(
                          contentPadding: EdgeInsets.all(0),
                          title: Row(
                            crossAxisAlignment: CrossAxisAlignment.center,
                            children: <Widget>[
                              Text(
                                model.name,
                                style: titleStyle,
                              ),
                              SizedBox(
                                width: 10,
                              ),
                              Icon(Icons.check_circle,
                                  size: 18,
                                  color: Theme.of(context).primaryColor),
                              Spacer(),
                            ],
                          ),
                          subtitle: Text(
                            model.type,
                            style: TextStyles.bodySm.subTitleColor.bold,
                          ),
                        ),
                        Divider(
                          thickness: .3,
                          color: LightColor.grey,
                        ),
                        Row(
                          children: <Widget>[
                            ProgressWidget(
                                value: model.goodReviews,
                                totalValue: 100,
                                activeColor: LightColor.lightBlue,
                                backgroundColor:
                                    LightColor.grey.withOpacity(.3),
                                title: "Humor",
                                durationTime: 500),
                            ProgressWidget(
                                value: model.totalScore,
                                totalValue: 100,
                                activeColor: LightColor.lightBlue,
                                backgroundColor:
                                    LightColor.grey.withOpacity(.3),
                                title: "Tarefas",
                                durationTime: 300),
                            ProgressWidget(
                                value: model.satisfaction,
                                totalValue: 100,
                                activeColor: LightColor.lightBlue,
                                backgroundColor:
                                    LightColor.grey.withOpacity(.3),
                                title: "Satisfação",
                                durationTime: 800),
                          ],
                        ),
                        Divider(
                          thickness: .3,
                          color: LightColor.grey,
                        ),
                        Text("Descrição", style: titleStyle).vP16,
                        Text(
                          model.description,
                          style: TextStyles.body.subTitleColor,
                        ),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: <Widget>[
                            Container(
                              height: 45,
                              width: 45,
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(10),
                                  color: LightColor.grey.withAlpha(150)),
                              child: Icon(
                                Icons.call,
                                color: Colors.white,
                              ),
                            ).ripple(
                              () {},
                              borderRadius: BorderRadius.circular(10),
                            ),
                            SizedBox(
                              width: 10,
                            ),
                            Container(
                              height: 45,
                              width: 45,
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(10),
                                  color: LightColor.grey.withAlpha(150)),
                              child: Icon(
                                Icons.chat_bubble,
                                color: Colors.white,
                              ),
                            ).ripple(
                              () {},
                              borderRadius: BorderRadius.circular(10),
                            ),
                            SizedBox(
                              width: 10,
                            ),
                            FlatButton(
                              color: Theme.of(context).primaryColor,
                              shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(10)),
                              onPressed: () {},
                              child: Text(
                                "Registar uma Tarefa",
                                style: TextStyles.titleNormal.white,
                              ).p(10),
                            ),
                          ],
                        ).vP16
                      ],
                    ),
                  ),
                );
              },
            ),
            _appbar(),
          ],
        ),
      ),
    );
  }
}
