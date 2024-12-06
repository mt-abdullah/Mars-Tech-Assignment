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

int main() {
    int num;


    printf("Enter a number: ");
    scanf("%d", &num);


    int reversedNum = reverseNumber(num);


    printf("Reversed number: %d\n", reversedNum);

    return 0;
}
