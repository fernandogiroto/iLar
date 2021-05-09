import 'package:flutter/material.dart';
import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:app/commons/custom_app_bar.dart';
import 'package:app/theme.dart';
import 'package:app/commons/custom_bottom_bar.dart';

class SettingsScreen extends StatefulWidget {
  @override
  _SettingsScreenState createState() => _SettingsScreenState();
}

class _SettingsScreenState extends State<SettingsScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 2),
      backgroundColor: drawerBackgroundColor,
      body: Container(
        color: drawerBackgroundColor,
        padding: EdgeInsets.all(20.0),
        child: Column(),
      ),
      bottomNavigationBar: CustomBottomBar(),
    );
  }
}
