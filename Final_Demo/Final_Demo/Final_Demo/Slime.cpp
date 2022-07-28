#include "Slime.h"
#include "Fight_Slime.h"
#include <iostream>
using namespace std;

Slime::Slime(int x1, int y1) 
{
	x = x1;
	y = y1;
	mapSlime[x][y] = 2;

	if (flag2 == 1)
		slime_die_map();

	makemap();
}
void Slime::makemap() 
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapSlime[i][j] == 1)
				cout << "¡½";
			else if (mapSlime[i][j] == 2)
				cout << "¢I";
			else if (mapSlime[i][j] == 3)
				cout << "¢Ý";
			else if (mapSlime[i][j] == 0 || mapSlime[i][j] == 501 || mapSlime[i][j] == 400)
				cout << "¡@";
			else if (mapSlime[i][j] == 5)
				cout << "¡E";
		}
		cout << endl;
	}
	control();
}

void Slime::control()
{
	int mov = _getch();
	int tempi = x, tempj = y;

	if (mov == 's')//¤U
	{
		mapSlime[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//¤W
	{
		mapSlime[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//¥ª
	{
		mapSlime[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//¥k
	{
		mapSlime[x][y] = 0;
		y += 1;
	}

	if (mapSlime[x][y] == 1)//¼²ùÙ
	{
		x = tempi;
		y = tempj;
		mapSlime[x][y] = 2;
	}
	else if (mapSlime[x][y] == 5)//¼²³õ´º
	{
		x = tempi;
		y = tempj;
		mapSlime[x][y] = 2;
	}
	else if (mapSlime[x][y] == 3)//¼²³õ´º
	{
		static Fight_Slime gogo;
		if (win_lose == 1)
		{
			x = tempi;
			y = tempj;
			flag2 = 1;
			mapSlime[x][y] = 2;
		}
		else
			return;
	}
	else
		mapSlime[x][y] = 2;

	cls();

	if (x == 0)
		xx = 400;
	else if (x == 20)
		xx = 501;
	else
	{
		if (flag2 == 1)
			slime_die_map();
		makemap();
	}
}

void Slime::slime_die_map()
{
	for (int i = 0; i < 27; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapSlime[i][j] == 3)
				mapSlime[i][j] = 0;
		}
	}
}