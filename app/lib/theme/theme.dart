import 'package:flutter/material.dart';

import 'light_color.dart';

class AppTheme {
  const AppTheme();
  static ThemeData lightTheme = ThemeData(
      backgroundColor: Colors.white,
      primaryColor: LightColor.purple,
      cardTheme: CardTheme(color: LightColor.background),
      textTheme: TextTheme(display1: TextStyle(color: LightColor.black)),
      iconTheme: IconThemeData(color: LightColor.iconColor),
      bottomAppBarColor: LightColor.background,
      dividerColor: LightColor.grey,
      primaryTextTheme:
          TextTheme(body1: TextStyle(color: LightColor.titleTextColor)));

  static TextStyle titleStyle =
      const TextStyle(color: LightColor.titleTextColor, fontSize: 16);
  static TextStyle subTitleStyle =
      const TextStyle(color: LightColor.subTitleTextColor, fontSize: 12);

  static TextStyle h1Style =
      const TextStyle(fontSize: 24, fontWeight: FontWeight.bold);
  static TextStyle h2Style = const TextStyle(fontSize: 22);
  static TextStyle h3Style = const TextStyle(fontSize: 20);
  static TextStyle h4Style = const TextStyle(fontSize: 18);
  static TextStyle h5Style = const TextStyle(fontSize: 16);
  static TextStyle h6Style = const TextStyle(fontSize: 14);

  static List<BoxShadow> shadow = <BoxShadow>[
    BoxShadow(color: Color(0xfff8f8f8), blurRadius: 10, spreadRadius: 15),
  ];

  static EdgeInsets padding =
      const EdgeInsets.symmetric(horizontal: 20, vertical: 10);
  static EdgeInsets hPadding = const EdgeInsets.symmetric(
    horizontal: 10,
  );

  static double fullWidth(BuildContext context) {
    return MediaQuery.of(context).size.width;
  }

  static double fullHeight(BuildContext context) {
    return MediaQuery.of(context).size.height;
  }
}

TextStyle listTitleDefaultTextStyle = TextStyle(
    color: Colors.white70, fontSize: 20.0, fontWeight: FontWeight.w600);
TextStyle listTitleSelectedTextStyle =
    TextStyle(color: Colors.white, fontSize: 20.0, fontWeight: FontWeight.w600);

Color selectedColor = Colors.yellow;
Color drawerBackgroundColor = Color(0xFF05668D);
Color bgColorWhite = Colors.white;
Color itemListColor = Color(0xFFEEEEEE);
Color subtitleGray = Color(0xB7B6B6);

// COLOR SCHEME
Color primaryColor = Color(0xFF028090);
Color secondColor = Color(0xFF05668D);
Color thirdColor = Color(0xFF00A896);
Color fourthColor = Color(0xFF02C39A);
Color fifthColor = Color(0xFFF0F3BD);

Color textWhiteColor = Color(0xFFFFFFFF);
Color textBlackColor = Color(0xFF000000);
