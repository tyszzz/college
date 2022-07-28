#include "Map.h"

Map::Map() 
{

};

int Map::flag = 0;
int Map::flag1 = 0;
int Map::flag2 = 0;

void Map::cls()
{
	COORD coor = { 0,0 };
	for (int i = 0; i < 1; i++) 
	{
		coor.X = i;
		coor.Y = 0;
		SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coor);
	}
}

void Map::talk(int code)
{
	if (code == 1)
	{
		if (flag == 0) {
			cout << endl << endl << "	偉大勇者啊，請去討伐上古龍!" << endl << endl << "	j 攻擊	k 使用道具" << endl << "				Enter>>>>";
			flag = 1;
		}
		else if (flag == 1) {
			cout << endl << endl << "	快點去吧!全村的食物快被吃光了!" << endl << endl << "	j 攻擊	k 使用道具" << endl << "				Enter>>>>";
		}
		_getch();
		system("cls");
	}
	else if (code == 2)
	{
		if (flag == 0) {
			cout << endl << endl << "	前方路途危險，請去找村長!" << endl << endl << endl << "				Enter>>>>";
		}
		else if (flag == 1) {
			cout << endl << endl << "	偉大的勇者啊，村里的希望就靠你了!" << endl << endl << endl << "				Enter>>>>";
			flag1 = 1;
		}
		_getch();
		system("cls");
	}
}