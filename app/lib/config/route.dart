import 'package:flutter/material.dart';
import 'package:app/views/detail_page.dart';
import 'package:app/views/home_page.dart';
import 'package:app/views/splash_page.dart';
import 'package:app/widgets/coustom_route.dart';
import 'package:app/views/patient_screen.dart';

class Routes {
  static Map<String, WidgetBuilder> getRoute() {
    return <String, WidgetBuilder>{
      '/': (_) => SplashPage(),
      '/homepage': (_) => HomePage(),
      '/patients': (_) => PatientsScreen(),
    };
  }

  static Route onGenerateRoute(RouteSettings settings) {
    final List<String> pathElements = settings.name.split('/');
    if (pathElements[0] != '' || pathElements.length == 1) {
      return null;
    }
    switch (pathElements[1]) {
      case "DetailPage":
        return CustomRoute<bool>(
            builder: (BuildContext context) => DetailPage(
                  model: settings.arguments,
                ));
    }
  }
}
