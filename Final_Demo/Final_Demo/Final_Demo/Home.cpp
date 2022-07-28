#include "Home.h"
#include<iostream>
#include <string>
using namespace std;

int win_lose;
int atk;
int hp;
int posion_count;
string eqm;
int lv;
int setonce=1;
int Home::xx;
int Home::yy;

Home::Home(int x1, int y1)
{
	x = x1;
	y = y1;

	if (setonce == 1)
	{
	setablilty();
	setonce--;
	}

	mapHome[x][y] = 2;
	makemap();
}
void Home::setablilty()
{
	atk = 5;
	hp = 20;
	posion_count = 0;
	eqm = "ÃÄ¤ô->";
	lv = 1;
}

void Home::makemap()
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapHome[i][j] == 1)
				cout << "¡½";
			else if (mapHome[i][j] == 0)
				cout << "  ";
			else if (mapHome[i][j] == 2)
				cout << "¢I";
			else if (mapHome[i][j] == 3)
				cout << "¥×";
			else if (mapHome[i][j] == 4)
				cout << "¡ó";
			else if (mapHome[i][j] == 100)
				cout << "  ";
		}
		cout << endl;
	}
	control();
}

void Home::control() 
{
	int mov = _getch();
	int tempi = x, tempj = y;

	if (mov == 's')//¤U
	{
		mapHome[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//¤W
	{
		mapHome[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//¥ª
	{
		mapHome[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//¥k
	{
		mapHome[x][y] = 0;
		y += 1;
	}

	if (mapHome[x][y] == 1)//¼²ùÙ
	{
		x = tempi;
		y = tempj;
		mapHome[x][y] = 2;
	}
	else if (mapHome[x][y] == 3)//¼²³õ´º
	{
		x = tempi;
		y = tempj;
		mapHome[x][y] = 2;
	}
	else if (mapHome[x][y] == 4)//¼²³õ´º
	{
		x = tempi;
		y = tempj;
		mapHome[x][y] = 2;
	}
	else
		mapHome[x][y] = 2;

	cls();

	if (x == 20) 
		xx = 100;
	else
	makemap();
}