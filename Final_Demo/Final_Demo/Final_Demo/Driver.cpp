#include "All_Header.h"

int main() 
{
	Landing landing1;
	Story story1;
	Gate gate;

	Home Home1(3, 15);
	while (1)
	{
		if (gate.xx == 100)
			Middle middle1(1, 10);
		else if (gate.xx == 101)
			Home gate(19, 10);
		else if (gate.xx == 201)
			Captain captain1(10, 1);
		else if (gate.xx == 301)
			Village village1(1, 10);
		else if (gate.xx == 200)
			Middle middle1(10, 19);
		else if (gate.xx == 300)
			Middle middle1(19, 10);
		else if (gate.xx == 400)
			Village village1(19, 10);
		else if (gate.xx == 501)
			Boss boss1(1, 10);
		else if (gate.xx == 500)
			Slime slime1(19, 10);
		else if (gate.xx == 401)
			Slime slime1(1, 10);
		else if (gate.xx == 1000)
			break;
	}
	return 0;
}