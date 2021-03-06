import 'package:flutter/material.dart';

class NavigationModel {
  String title;
  IconData icon;
  String cmp;
  NavigationModel({this.title, this.icon, this.cmp});
}

List<NavigationModel> navigationItems = [
  NavigationModel(title: "Serviços", icon: Icons.add, cmp: "/homepage"),
  NavigationModel(title: "Utentes", icon: Icons.supervised_user_circle, cmp: "/patients"),
  NavigationModel(title: "Opções", icon: Icons.settings, cmp: "settings"),
    NavigationModel(title: "Criar Utente", icon: Icons.supervised_user_circle, cmp: "/utente/criar"),

];
