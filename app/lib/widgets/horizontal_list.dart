import 'package:flutter/material.dart';
import 'package:app/widgets/list_items.dart';

class ItemList extends StatefulWidget {
  final List items;
  ItemList({this.items});

  @override
  _ItemListState createState() => _ItemListState(items: this.items);
}

class _ItemListState extends State<ItemList>
    with SingleTickerProviderStateMixin {
  double maxWidth = 20;
  double minWidth = 20;
  bool isCollapsed = false;
  AnimationController _animationController;
  Animation<double> widthAnimation;
  int currentSelectedIndex = 0;
  List items;
  _ItemListState({this.items});

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    _animationController =
        AnimationController(vsync: this, duration: Duration(milliseconds: 200));
    widthAnimation = Tween<double>(begin: maxWidth, end: minWidth)
        .animate(_animationController);
  }

  int getState() {
    return currentSelectedIndex;
  }

  @override
  Widget build(BuildContext context) {
    return AnimatedBuilder(
      animation: _animationController,
      builder: (context, widget) => getWidget(context, widget),
    );
  }

  Widget getWidget(context, widget) {
    return Expanded(
      child: Column(
        children: [
          Expanded(
            flex: 2,
            child: Container(
              constraints: BoxConstraints.expand(),
              child: _listItems(),
            ),
          ),
          SizedBox(
            height: 15.0,
          ),
          Expanded(
            flex: 10,
            child: Container(
              constraints: BoxConstraints.expand(),
            ),
          )
        ],
      ),
    );
  }

  Widget _listItems() {
    return ListView.builder(
      scrollDirection: Axis.horizontal,
      itemBuilder: (context, counter) {
        return ListItems(
            onTap: () {
              setState(() {
                currentSelectedIndex = counter;
              });
            },
            isSelected: currentSelectedIndex == counter,
            title: items[counter].title,
            picture: items[counter].picture,
            animationController: _animationController);
      },
      itemCount: items.length,
    );
  }
}
