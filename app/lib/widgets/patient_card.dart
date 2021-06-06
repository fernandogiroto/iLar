import 'package:app/theme/theme.dart';
import 'package:flutter/material.dart';
import 'package:app/widgets/patient_info.dart';

class PatientTile extends StatelessWidget {
  final String patientImagePath;
  final String patientName;
  final int patientIdade;
  PatientTile({this.patientImagePath, this.patientName, this.patientIdade});
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
            context, MaterialPageRoute(builder: (context) => PatientInfo()));
      },
      child: Container(
        decoration: BoxDecoration(
            color: secondColor, borderRadius: BorderRadius.circular(20)),
        padding: EdgeInsets.symmetric(horizontal: 24, vertical: 18),
        child: Row(
          children: <Widget>[
            Container(
              width: 55.0,
              height: 55.0,
              decoration: BoxDecoration(
                shape: BoxShape.circle,
                image: DecorationImage(
                  fit: BoxFit.fill,
                  image: AssetImage(patientImagePath),
                ),
              ),
            ),
            SizedBox(
              width: 17,
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                Text(
                  patientName,
                  style: TextStyle(color: textWhiteColor, fontSize: 19),
                ),
                SizedBox(
                  height: 2,
                ),
                Text(
                  "$patientIdade anos | Falta Design",
                  style: TextStyle(color: textWhiteColor, fontSize: 15),
                )
              ],
            ),
            Spacer(),
            Container(
              padding: EdgeInsets.symmetric(horizontal: 15, vertical: 9),
              child: Icon(
                Icons.add_circle,
                color: textWhiteColor,
                size: 35,
              ),
            )
          ],
        ),
      ),
    );
  }
}
