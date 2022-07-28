#ifndef CLS_H
#define CLS_H

#include <windows.h>

void cls()
{
	COORD coor = { 0,0 };
	for (int i = 0; i < 1; i++) 
	{
		coor.X = i;
		coor.Y = 0;
		SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coor);
	}
}

#endif // !Cls_h