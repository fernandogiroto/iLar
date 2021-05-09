import 'package:flutter/material.dart';
import 'package:ff_navigation_bar/ff_navigation_bar.dart';
import 'package:app/theme.dart';

class CustomBottomBar extends StatefulWidget {
  CustomBottomBar({Key key}) : super(key: key);

  @override
  _CustomBottomBarMenuState createState() => _CustomBottomBarMenuState();
}

class _CustomBottomBarMenuState extends State<CustomBottomBar> {
  int selectedIndex = 2;
  @override
  Widget build(BuildContext context) {
    return FFNavigationBar(
      theme: FFNavigationBarTheme(
        barBackgroundColor: Colors.white,
        selectedItemBorderColor: primaryColor,
        selectedItemBackgroundColor: primaryColor,
        selectedItemIconColor: textWhiteColor,
        selectedItemLabelColor: textBlackColor,
      ),
      selectedIndex: selectedIndex,
      onSelectTab: (index) {
        setState(() {
          selectedIndex = index;
        });
      },
      items: [
        FFNavigationBarItem(
          iconData: Icons.calendar_today,
          label: 'Atividades',
        ),
        FFNavigationBarItem(
          iconData: Icons.people,
          label: 'Utentes',
        ),
        FFNavigationBarItem(
          iconData: Icons.add_circle,
          label: 'Adicionar',
        ),
        FFNavigationBarItem(
          iconData: Icons.description,
          label: 'Notas',
        ),
        FFNavigationBarItem(
          iconData: Icons.settings,
          label: 'Opções',
        ),
      ],
    );
  }
}
