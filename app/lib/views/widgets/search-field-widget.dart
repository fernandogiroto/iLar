import 'package:app/theme/light_color.dart';
import 'package:flutter/material.dart';

Widget SearchField(context) {
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
          suffixIcon: SizedBox(
              width: 50,
              child: Align(
                child: Icon(Icons.search, color: LightColor.lightBlue),
              ),
             ),
        ),
      ),
    );
  }
