#include <stdio.h>
#include <math.h>

typedef struct Point{  //decleration not definition
	double x;
	double y;
	//double y1;
	//double x1;

	double (*calculate_distance)(struct Point*);
}Point;

double _calculate_distance(Point *p){
	return sqrt(p->x * p->x + p->y * p->y);
}

//constructor
void  _init_point(Point *p, double x, double y){
	p->x = x;
	p->y = y;
	//p->y1 = y;
	//p->x1 = x;
	p->calculate_distance = _calculate_distance ;
}

int main (){

	Point p;
	_init_point(&p, 4, 6);
	printf("%lf \n", p.calculate_distance(&p));
}
