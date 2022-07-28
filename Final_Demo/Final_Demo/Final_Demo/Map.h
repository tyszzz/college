#ifndef MAP_H
#define MAP_H

#include <iostream>
#include <conio.h>
#include <Windows.h>
#include <string>
using namespace std;

class Map {
public:
	static int xx, yy;
protected:
	int x;
	int y;
	static int flag;
	static int flag1;
	static int flag2;

	Map();
	virtual void makemap() = 0;
	virtual void control() = 0;
	void cls();
	static void talk(int);
private:
};

#endif