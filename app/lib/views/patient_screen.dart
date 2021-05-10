import 'package:flutter/material.dart';
import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:app/commons/custom_app_bar.dart';
import 'package:app/commons/custom_bottom_bar.dart';
import 'package:app/widgets/patient_card.dart';
import 'package:app/theme.dart';

class PatientsScreen extends StatefulWidget {
  @override
  _PatientsScreenState createState() => _PatientsScreenState();
}

class _PatientsScreenState extends State<PatientsScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 1),
      body: SingleChildScrollView(
        child: Container(
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
              Text(
                'Escolha o utente',
                style: TextStyle(color: Colors.grey, fontSize: 18.0),
              ),
              SizedBox(height: 15),
              Container(
                padding: EdgeInsets.symmetric(horizontal: 24),
                height: 50,
                decoration: BoxDecoration(
                    color: Color(0xffEFEFEF),
                    borderRadius: BorderRadius.circular(14)),
                child: Row(
                  children: <Widget>[
                    Icon(Icons.search),
                    SizedBox(
                      width: 10,
                    ),
                    Text(
                      "Pesquisar Utente",
                      style: TextStyle(color: Colors.grey, fontSize: 19),
                    )
                  ],
                ),
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/vovo.jpeg",
                patientName: "Manuel Ribeiro",
                patientIdade: 86,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/clementina.jpeg",
                patientName: "Clementina Jesus",
                patientIdade: 89,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/herminio.jpeg",
                patientName: "Herminio Tavares",
                patientIdade: 82,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/margarida.jpeg",
                patientName: "Margarida Amaro",
                patientIdade: 78,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/paulo.jpeg",
                patientName: "Paulo Portugal",
                patientIdade: 91,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/vovo.jpeg",
                patientName: "Manuel Ribeiro",
                patientIdade: 86,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/vovo.jpeg",
                patientName: "Manuel Ribeiro",
                patientIdade: 86,
              ),
              SizedBox(height: 20),
              PatientTile(
                patientImagePath: "assets/img/vovo.jpeg",
                patientName: "Manuel Ribeiro",
                patientIdade: 86,
              ),
            ],
          ),
        ),
      ),
      bottomNavigationBar: CustomBottomBar(index: 1),
    );
  }
}
