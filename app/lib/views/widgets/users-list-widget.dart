
import 'package:app/views/widgets/patient-list-tile-widget.dart';
import 'package:flutter/material.dart';

class UsersList extends StatelessWidget {
  final context;
  final data;

  const UsersList(Map<Object, Object> map, {this.context, this.data});

  @override
  Widget build(BuildContext context) {
    return SliverList(
        delegate: SliverChildListDelegate(
      [
        Column(mainAxisSize: MainAxisSize.min, children: [
          Container(
            width: double.infinity,
            padding: EdgeInsets.symmetric(horizontal: 5),
            child: ElevatedButton.icon(
                onPressed: () {
                  print('adicionar');
                  Navigator.pushNamed(context, '/utente/criar');
                },
                icon: Icon(Icons.add),
                label: Text('ADICIONAR'),
                style: ButtonStyle()),
          ),
        ]),
        Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: <Widget>[
            Text("Últimos Registos",
                style: TextStyle(fontWeight: FontWeight.bold)),
            IconButton(
                icon: Icon(
                  Icons.sort,
                  color: Theme.of(context).primaryColor,
                ),
                onPressed: () {})
          ],
        ),
        new Container(
            constraints:
                BoxConstraints(minWidth: double.infinity, maxHeight: 400),
            child: (data.length > 0)
                ? new ListView.builder(
                    itemBuilder: (ctx, i) {
                      return PatientTile(data[i]);
                    },
                    itemCount: data.length)
                : new Card(
                    color: Colors.red.shade50,
                    child: Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Text('Não existem registos.',
                          textAlign: TextAlign.center),
                    )))
      ],
    ));
  }
}
