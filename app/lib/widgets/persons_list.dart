import 'package:flutter/material.dart';

class PersonsList extends StatelessWidget {
  final List persons;

  const PersonsList({@required this.persons});


  @override
  Widget build(BuildContext context) {
    return Container(
      height: 200,
      child: ListView.builder(
        itemBuilder: (ctx, i){
          print(i);
        },
        itemCount: persons != null ? persons.length : 0,),
    );
  }
}
