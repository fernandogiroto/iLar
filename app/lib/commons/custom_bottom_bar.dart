import 'package:flutter/material.dart';
import 'package:ff_navigation_bar/ff_navigation_bar.dart';
import 'package:app/theme.dart';

class CustomBottomBar extends StatefulWidget {
  final int index;
  CustomBottomBar({Key key, @required this.index}) : super(key: key);

  @override
  _CustomBottomBarMenuState createState() => _CustomBottomBarMenuState(index);
}

class _CustomBottomBarMenuState extends State<CustomBottomBar> {
  int selectedIndex;
  _CustomBottomBarMenuState(this.selectedIndex);

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
          if (selectedIndex == 1)
            Navigator.pushNamed(context, 'patients');
          else if (selectedIndex == 2)
            Navigator.pushNamed(context, 'homescreen');
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
          iconData: Icons.notifications_active,
          label: 'Alertas',
        ),
      ],
    );
  }
}
