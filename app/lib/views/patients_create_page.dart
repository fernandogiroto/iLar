import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:app/commons/custom_app_bar.dart';
import 'package:app/commons/custom_bottom_bar.dart';
import 'package:app/views/widgets/search-field-widget.dart';
import 'package:flutter/material.dart';

class PatientsCreatePage extends StatefulWidget {
  

  @override
  _PatientsCreatePageState createState() => _PatientsCreatePageState();
}

class _PatientsCreatePageState extends State<PatientsCreatePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 1),
      backgroundColor: Colors.white,
      body: CustomScrollView(
        slivers: <Widget>[
          SliverList(
            delegate: SliverChildListDelegate(
              [
                SearchField(context),
              ],
            ),
          ),

          ElevatedButton(
          onPressed: () {
            Navigator.pop(context);
          },
          child: Text('Go back!'),
        ),
        ],
      ),
      bottomNavigationBar: CustomBottomBar(index: 1),
    );
  }
}