import 'package:flutter/material.dart';
import 'package:app/commons/custom_bottom_bar.dart';
import 'icon_tile.dart';
import 'package:app/theme/theme.dart';

class PatientInfo extends StatefulWidget {
  @override
  _PatientInfoState createState() => _PatientInfoState();
}

class _PatientInfoState extends State<PatientInfo> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.transparent,
        elevation: 0.0,
        brightness: Brightness.light,
        iconTheme: IconThemeData(color: Colors.black87),
      ),
      body: SingleChildScrollView(
        child: Container(
          padding: EdgeInsets.symmetric(horizontal: 24),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              Row(
                children: <Widget>[
                  ClipRRect(
                      borderRadius: BorderRadius.circular(30.0),
                      child: Image.asset("assets/img/vovo.jpeg", height: 220)),
                  SizedBox(
                    width: 20,
                  ),
                  Container(
                    width: MediaQuery.of(context).size.width - 222,
                    height: 220,
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        Text(
                          "Manuel Ribeiro",
                          style: TextStyle(fontSize: 30),
                        ),
                        Text(
                          "86 anos",
                          style: TextStyle(fontSize: 19, color: Colors.grey),
                        ),
                        SizedBox(
                          height: 40,
                        ),
                        Row(
                          children: <Widget>[
                            IconTile(
                              backColor: secondColor,
                              icon: Icons.add,
                              iconColor: Colors.white,
                            ),
                            IconTile(
                              backColor: secondColor,
                              icon: Icons.phone,
                              iconColor: Colors.white,
                            ),
                            IconTile(
                              backColor: thirdColor,
                              icon: Icons.print,
                              iconColor: Colors.white,
                            ),
                          ],
                        )
                      ],
                    ),
                  ),
                ],
              ),
              SizedBox(
                height: 26,
              ),
              Text(
                "Informações",
                style: TextStyle(fontSize: 22),
              ),
              SizedBox(
                height: 16,
              ),
              Text(
                "Manuel Ribeiro foi o português pioneiro na tecnologia no país. Programador e fundador da linguagem PT++, focada em armazenamento de dados e orientada a objetos. Enloqueceu após se aprofundar em arrays. Está sempre de mau humor e assedia frequentemente as enfermeiras.",
                style: TextStyle(color: Colors.grey, fontSize: 16),
              ),
              SizedBox(
                height: 24,
              ),
              Column(
                children: <Widget>[
                  Row(
                    children: <Widget>[
                      Icon(Icons.pin_drop, color: Colors.grey),
                      SizedBox(
                        width: 10,
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text(
                            "Morada",
                            style: TextStyle(
                                color: Colors.black87.withOpacity(0.7),
                                fontSize: 20),
                          ),
                          SizedBox(
                            height: 3,
                          ),
                          Container(
                              width: MediaQuery.of(context).size.width - 150,
                              child: Text(
                                "Rua São Sebastião 123, 1°esquerdo. Lisboa - Amadora",
                                style: TextStyle(color: Colors.grey),
                              ))
                        ],
                      )
                    ],
                  ),
                  SizedBox(
                    height: 15,
                  ),
                  Row(
                    children: <Widget>[
                      Icon(Icons.history, color: Colors.grey),
                      SizedBox(
                        width: 10,
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text(
                            "Entrada",
                            style: TextStyle(
                                color: Colors.black87.withOpacity(0.7),
                                fontSize: 20),
                          ),
                          SizedBox(
                            height: 3,
                          ),
                          Container(
                              width: MediaQuery.of(context).size.width - 150,
                              child: Text(
                                "10/Março/2021 | 15:35hrs",
                                style: TextStyle(color: Colors.grey),
                              ))
                        ],
                      )
                    ],
                  ),
                ],
              ),
              SizedBox(height: 35),
              Text(
                "Atividades",
                style: TextStyle(fontSize: 22),
              ),
              SizedBox(
                height: 5,
              ),
              Column(
                children: <Widget>[
                  Row(
                    children: <Widget>[
                      Icon(Icons.check, color: Colors.grey),
                      SizedBox(
                        width: 10,
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text(
                            "Atividade 01 - Falta Design",
                            style: TextStyle(
                                color: Colors.black87.withOpacity(0.7),
                                fontSize: 15),
                          ),
                          SizedBox(
                            height: 3,
                          ),
                        ],
                      )
                    ],
                  ),
                  SizedBox(
                    height: 30,
                  ),
                ],
              ),
              Row(
                children: <Widget>[
                  Expanded(
                    child: Container(
                      padding:
                          EdgeInsets.symmetric(vertical: 24, horizontal: 16),
                      decoration: BoxDecoration(
                          color: primaryColor,
                          borderRadius: BorderRadius.circular(20)),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Container(
                            padding: EdgeInsets.all(8),
                            decoration: BoxDecoration(
                                color: thirdColor,
                                borderRadius: BorderRadius.circular(16)),
                            child: Icon(
                              Icons.print,
                              color: Colors.white,
                            ),
                          ),
                          SizedBox(
                            width: 16,
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width / 2 - 130,
                            child: Text(
                              "Relatório",
                              style:
                                  TextStyle(color: Colors.white, fontSize: 17),
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                  SizedBox(
                    width: 16,
                  ),
                  Expanded(
                    child: Container(
                      padding:
                          EdgeInsets.symmetric(vertical: 24, horizontal: 16),
                      decoration: BoxDecoration(
                          color: Color(0xffA5A5A5),
                          borderRadius: BorderRadius.circular(20)),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Container(
                            padding: EdgeInsets.all(8),
                            decoration: BoxDecoration(
                                color: Color(0xffBBBBBB),
                                borderRadius: BorderRadius.circular(16)),
                            child: Icon(
                              Icons.medical_services,
                              color: Colors.white,
                            ),
                          ),
                          SizedBox(
                            width: 16,
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width / 2 - 130,
                            child: Text(
                              "Psicólogo",
                              style:
                                  TextStyle(color: Colors.white, fontSize: 17),
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ],
              ),
              SizedBox(
                height: 30,
              ),
            ],
          ),
        ),
      ),
      bottomNavigationBar: CustomBottomBar(
        index: 2,
      ),
    );
  }
}
