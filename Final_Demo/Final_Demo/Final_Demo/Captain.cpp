#include "Captain.h"
#include <iostream>
using namespace std;

Captain::Captain(int x1, int y1) 
{
	x = x1;
	y = y1;
	mapCaptain[x][y] = 2;
	makemap();
}

void Captain::makemap() 
{
	for (int i = 0; i < 21; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapCaptain[i][j] == 1 || mapCaptain[i][j] == 12) 
				cout << "��";
			if (mapCaptain[i][j] == 2)
				cout << "�I";
			else if (mapCaptain[i][j] == 0 || mapCaptain[i][j] == 200) 
				cout << "  ";
			else if (mapCaptain[i][j] == 7)
				cout << "��";
			else if (mapCaptain[i][j] == 8) 
				cout << " |";
			else if (mapCaptain[i][j] == 9)
				cout << " /";
			else if (mapCaptain[i][j] == 10)
				cout << "\\ ";
			else if (mapCaptain[i][j] == 11)
				cout << "| ";
		}
		cout << endl;
	}
	control();
}

void Captain::control()
{
	int mov = _getch();
	int tempi = x, tempj = y;

	if (mov == 's')//�U
	{
		mapCaptain[x][y] = 0;
		x += 1;
	}
	else if (mov == 'w')//�W
	{
		mapCaptain[x][y] = 0;
		x -= 1;
	}
	else if (mov == 'a')//��
	{
		mapCaptain[x][y] = 0;
		y -= 1;
	}
	else if (mov == 'd')//�k
	{
		mapCaptain[x][y] = 0;
		y += 1;
	}

	if (mapCaptain[x][y] == 1)//����
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
	}
	else if (mapCaptain[x][y] == 7)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
		talk(1);
	}
	else if (mapCaptain[x][y] == 8)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
	}
	else if (mapCaptain[x][y] == 9)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
		talk(1);
	}
	else if (mapCaptain[x][y] == 10)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
		talk(1);
	}
	else if (mapCaptain[x][y] == 11)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
	}
	else if (mapCaptain[x][y] == 12)//������
	{
		x = tempi;
		y = tempj;
		mapCaptain[x][y] = 2;
		talk(1);
	}
	else
		mapCaptain[x][y] = 2;

	cls();

	if (y == 0)
		xx = 200;
	else
		makemap();
}
