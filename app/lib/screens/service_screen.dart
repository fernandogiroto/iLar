import 'package:flutter/material.dart';
import 'package:app/commons/collapsing_navigation_drawer.dart';
import 'package:app/widgets/horizontal_list.dart';
import 'package:app/models/service_model.dart';
import 'package:app/commons/custom_app_bar.dart';
import 'package:app/commons/custom_bottom_bar.dart';

class ServiceScreen extends StatefulWidget {
  @override
  _ServiceScreenState createState() => _ServiceScreenState();
}

class _ServiceScreenState extends State<ServiceScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(),
      drawer: CollapsingNavigationDrawer(currentSelectedIndex: 0),
      body: Container(
        color: Colors.white,
        padding: EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            Text(
              'Serviços',
              textAlign: TextAlign.start,
              style: TextStyle(fontWeight: FontWeight.w900, fontSize: 24.0),
            ),
            SizedBox(
              height: 8,
            ),
            Text(
              'Escolha um serviço',
              style: TextStyle(color: Colors.grey, fontSize: 18.0),
            ),
            SizedBox(
              height: 15,
            ),
            ItemList(items: serviceItems),
          ],
        ),
      ),
      bottomNavigationBar: CustomBottomBar(),
    );
  }
}
