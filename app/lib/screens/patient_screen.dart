import 'package:flutter/material.dart';
import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:app/widgets/horizontal_list.dart';
import 'package:app/models/patient_model.dart';
import 'package:app/commons/custom_app_bar.dart';

class PatientsScreen extends StatefulWidget {
  @override
  _PatientsScreenState createState() => _PatientsScreenState();
}

class _PatientsScreenState extends State<PatientsScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(counter: 8),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 1),
      body: Container(
        color: Colors.white,
        padding: EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            Text(
              'Utentes',
              textAlign: TextAlign.start,
              style: TextStyle(fontWeight: FontWeight.w900, fontSize: 24.0),
            ),
            SizedBox(
              height: 8,
            ),
            Text(
              'Escolha o utente',
              style: TextStyle(color: Colors.grey, fontSize: 18.0),
            ),
            SizedBox(
              height: 15,
            ),
            ItemList(items: patientItems),
          ],
        ),
      ),
    );
  }
}
