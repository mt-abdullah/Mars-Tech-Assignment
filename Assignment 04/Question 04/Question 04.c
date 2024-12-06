#include <stdio.h>

int reverseNumber(int number) {
    int reversed = 0;
    while (number != 0) {
        int digit = number % 10;
        reversed = reversed * 10 + digit;
        number /= 10;
    }
    return reversed;
}

int isRSRN(int num) {
    int square = num * num;

    int reversedNum = reverseNumber(num);


    int squareOfReversedNum = reversedNum * reversedNum;


    int reversedSquare = reverseNumber(squareOfReversedNum);


    return square == reversedSquare;
}

int main() {
    int num;


    printf("Enter a number: ");
    scanf("%d", &num);


    if (isRSRN(num)) {
        printf("%d is a Reverse Square Number.\n", num);
    } else {
        printf("%d is not a Reverse Square Number.\n", num);
    }

    return 0;
}
