#include "Middle.h"
#include <iostream>
using namespace std;

Middle::Middle(int x1, int y1) 
{
	x = x1;
	y = y1;
	mapMiddle[x][y] = 2;
	makemap();
}

void Middle::makemap() 
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapMiddle[i][j] == 1) 
				cout << "■";
			else if (mapMiddle[i][j] == 0 || mapMiddle[i][j] == 201 || mapMiddle[i][j] == 301 || mapMiddle[i][j] == 101) 
				cout << "  ";
			else if (mapMiddle[i][j] == 5) 
				cout << "品";
			else if (mapMiddle[i][j] == 6) 
				cout << "↓";
			else if (mapMiddle[i][j] == 2) 
				cout << "＠";
		}
		cout << endl;
	}
	control();
}

void Middle::control() 
{
	int mov = _getch();
	int tempi = x, tempj = y;

	if (mov == 's')//下
	{
		mapMiddle[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//上
	{
		mapMiddle[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//左
	{
		mapMiddle[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//右
	{
		mapMiddle[x][y] = 0;
		y += 1;
	}

	if (mapMiddle[x][y] == 1)//撞墻
	{
		x = tempi;
		y = tempj;
		mapMiddle[x][y] = 2;
	}
	else if (mapMiddle[x][y] == 5)//撞場景
	{
		x = tempi;
		y = tempj;
		mapMiddle[x][y] = 2;
	}
	else if (mapMiddle[x][y] == 6)//撞場景
	{
		x = tempi;
		y = tempj;
		mapMiddle[x][y] = 2;
	}
	else
		mapMiddle[x][y] = 2;

	cls();

		if (x == 0)
		xx = 101;
	else if (x == 20) 
		xx = 301;
	else if (y == 20) 
		xx = 201;
	else
		makemap();
}