  import 'package:app/helpers/randomColor.dart';
import 'package:app/models/patient_model.dart';
import 'package:app/theme/light_color.dart';
import 'package:flutter/material.dart';

class PatientTile extends StatelessWidget {
final PatientModel patient;

  const PatientTile(data, {
    this.patient
  });



  @override
  Widget build(BuildContext context) {
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
      child: InkWell(child: 
      
        Container(
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
                  color: randomColor(context),
                ),
                child: Image.asset(
                  patient.image,
                  height: 50,
                  width: 50,
                  fit: BoxFit.cover,
                ),
              ),
            ),
            title: Text(patient.name, style: TextStyle(fontWeight: FontWeight.bold)),
            subtitle: Text(
              patient.type,
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            trailing: Icon(
              Icons.keyboard_arrow_right,
              size: 30,
              color: Theme.of(context).primaryColor,
            ),
          ),
        ),
        onTap: () {
        Navigator.pushNamed(context, "/DetailPage", arguments: patient);
        }
      )
       
    );
  }
}