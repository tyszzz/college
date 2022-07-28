#include "Boss.h"
#include <iostream>
using namespace std;

Boss::Boss(int x1, int y1) 
{
	x = x1;
	y = y1;
	mapBoss[x][y] = 2;
	makemap();
}

void Boss::makemap()
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapBoss[i][j] == 1)
				cout << "¡½";
			if (mapBoss[i][j] == 2)
				cout << "¢I";
			else if (mapBoss[i][j] == 3)
				cout << "¡½";
			else if (mapBoss[i][j] == 0 || mapBoss[i][j] == 500)
				cout << "¡@";
			else if (mapBoss[i][j] == 5)
				cout << "¡E";
		}
		cout << endl;
	}
	control();
}

void Boss::control() 
{
	int mov = _getch();
	int tempi = x, tempj = y;
	int flag2 = 0;

	if (mov == 's')//¤U
	{
		mapBoss[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//¤W
	{
		mapBoss[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//¥ª
	{
		mapBoss[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//¥k
	{
		mapBoss[x][y] = 0;
		y += 1;
	}

	if (mapBoss[x][y] == 1)//¼²ùÙ
	{
		x = tempi;
		y = tempj;
		mapBoss[x][y] = 2;
	}
	else if (mapBoss[x][y] == 5)//¼²³õ´º
	{
		x = tempi;
		y = tempj;
		mapBoss[x][y] = 2;
	}
	else if (mapBoss[x][y] == 3)//¼²³õ´º
	{
		static Fight_Boss gogo;
		flag2 = 1;
	}
	else
		mapBoss[x][y] = 2;

	cls();

	if (flag2 == 1) 
		xx = 1000;
	else if (x == 0)
		xx = 500;
	else
		makemap();
}