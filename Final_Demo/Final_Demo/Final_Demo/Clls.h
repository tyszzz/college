#ifndef CLLS_h
#define CLLS_h

#include <windows.h>

void Clls()
{
	COORD coor = { 0,0 };
	for (int i = 0; i < 1; i++) 
	{
		coor.X = i;
		coor.Y = 0;
		SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coor);
	}
}

#endif // !CLLS_h