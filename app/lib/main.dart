import 'dart:io';

import 'package:flutter/material.dart';
import 'commons/collapsing_navigation_drawer.dart';
import 'views/service_screen.dart';
import 'package:app/config/route.dart';

void main(){
  HttpOverrides.global = new MyHttpOverrides();
  runApp(MyApp());
}

class MyHttpOverrides extends HttpOverrides{
  @override
  HttpClient createHttpClient(SecurityContext context){
    return super.createHttpClient(context)
      ..badCertificateCallback = (X509Certificate cert, String host, int port)=> true;
  }
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      routes: Routes.getRoute(),
      onGenerateRoute: (settings) => Routes.onGenerateRoute(settings),
      debugShowCheckedModeBanner: false,
      initialRoute: "SplashPage",
    );
  }
}

class MyHomePage extends StatefulWidget {
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        drawer: CollapsingNavigationDrawer(currentSelectedIndex: 0),
        body: Stack(
          children: <Widget>[
            Container(
              color: Colors.white,
              child: ServiceScreen(),
            ),
          ],
        ));
  }
}
