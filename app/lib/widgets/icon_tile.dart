import 'package:flutter/material.dart';

class IconTile extends StatelessWidget {
  final IconData icon;
  final Color backColor;
  final Color iconColor;

  IconTile({this.icon, this.backColor, this.iconColor});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(right: 16),
      child: Container(
        height: 45,
        width: 45,
        decoration: BoxDecoration(
            color: backColor, borderRadius: BorderRadius.circular(30)),
        child: Icon(
          icon,
          color: iconColor,
        ),
      ),
    );
  }
}
