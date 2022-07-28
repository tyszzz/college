#include "Village.h"
#include <iostream>
using namespace std;

Village::Village(int x1, int y1) 
{
	x = x1;
	y = y1;
	mapVillage[x][y] = 2;
	makemap();
}

void Village::makemap()
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapVillage[i][j] == 1)
				cout << "■";
			else if (mapVillage[i][j] == 0 || mapVillage[i][j] == 401 || mapVillage[i][j] == 300)
				cout << "  ";
			else if (mapVillage[i][j] == 23)//23代表"士兵"  
				cout << "士";
			else if (mapVillage[i][j] == 24)//23代表"門"  不需要可以刪掉 
			{
				if (flag1 == 1) 
					cout << "　";
				else
					cout << "＝";
			}
			else if (mapVillage[i][j] == 25)//23代表"堡壘"  
				cout << "●";
			if (mapVillage[i][j] == 2) 
				cout << "＠";
		}
		cout << endl;
	}
	control();
}


void Village::control() 
{
	int mov = _getch();
	int tempi = x, tempj = y;

	if (mov == 's')//下
	{
		mapVillage[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//上
	{
		mapVillage[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//左
	{
		mapVillage[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//右
	{
		mapVillage[x][y] = 0;
		y += 1;
	}

	if (mapVillage[x][y] == 1)//撞墻
	{
		x = tempi;
		y = tempj;
		mapVillage[x][y] = 2;
	}
	else if (mapVillage[x][y] == 23)//撞場景
	{
		x = tempi;
		y = tempj;
		mapVillage[x][y] = 2;
		talk(2);
	}
	else if (mapVillage[x][y] == 24)//撞場景
	{
		if (flag1 != 1) {
			x = tempi;
			y = tempj;
		}
		mapVillage[x][y] = 2;
	}
	else if (mapVillage[x][y] == 25)//撞場景
	{
		x = tempi;
		y = tempj;
		mapVillage[x][y] = 2;
	}
	else
		mapVillage[x][y] = 2;

	cls();

	 if (x == 0)
		xx = 300;
	else if (x == 20)
		xx = 401;
	else 
		 makemap();
}