import 'package:flutter/material.dart';
import 'package:app/theme/light_color.dart';
import 'package:app/theme/extention.dart';

class CustomAppBar extends StatefulWidget implements PreferredSizeWidget {
  CustomAppBar({Key key, this.title: 'Ilar'})
      : preferredSize = Size.fromHeight(kToolbarHeight),
        super(key: key);
  final String title;

  @override
  final Size preferredSize; // default is 56.0
  @override
  _CustomAppBarState createState() => _CustomAppBarState();
}

class _CustomAppBarState extends State<CustomAppBar> {
  @override
  Widget build(BuildContext context) {
    // return AppBar(
    //   title: Text(widget.title),
    //   elevation: 0.0,
    //   backgroundColor: drawerBackgroundColor,
    // );
    return AppBar(
      iconTheme: IconThemeData(color: Colors.black),
      elevation: 0,
      backgroundColor: Colors.white,
      actions: <Widget>[
        Icon(
          Icons.notifications_none,
          size: 30,
          color: LightColor.grey,
        ),
        ClipRRect(
          borderRadius: BorderRadius.all(Radius.circular(13)),
          child: Container(
            height: 40,
            width: 40,
            decoration: BoxDecoration(
              color: Theme.of(context).backgroundColor,
            ),
            child: Image.asset("assets/img/herminio.jpeg", fit: BoxFit.fill),
          ),
        ).p(8),
      ],
    );
  }
}
