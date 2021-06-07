import 'package:flutter/material.dart';
import 'commons/collapsing_navigation_drawer.dart';
import 'views/patient_screen.dart';
import 'views/service_screen.dart';
import 'views/settings_screen.dart';
import 'package:app/config/route.dart';

void main() => runApp(MyApp());

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
