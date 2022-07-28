#ifndef STORY_H
#define STROY_H

#include "Map.h"
#include <iostream>
using namespace std;

class Story :public Map
{
public:
	Story();
	void control() {};
	void makemap();
private:
};

#endif