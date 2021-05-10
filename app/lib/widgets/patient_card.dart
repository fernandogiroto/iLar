import 'package:app/theme.dart';
import 'package:flutter/material.dart';
import 'package:app/widgets/patient_info.dart';

class DoctorsTile extends StatelessWidget {
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
            ClipRRect(
              borderRadius: BorderRadius.circular(10.0),
              child: Image.asset(
                "assets/img/vovo.jpeg",
                width: 50,
                height: 50,
              ),
            ),
            SizedBox(
              width: 17,
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                Text(
                  "Manuel Ribeiro",
                  style: TextStyle(color: textWhiteColor, fontSize: 19),
                ),
                SizedBox(
                  height: 2,
                ),
                Text(
                  "86 anos | Falta Design",
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
