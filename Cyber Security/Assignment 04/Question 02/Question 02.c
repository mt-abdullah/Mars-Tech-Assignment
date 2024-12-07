#include <stdio.h>


void decomposeNumber(int number) {
    int place = 1;
    int digitCount;


    if (number <= 0) {
        printf("Please enter a number greater than 0.\n");
        return;
    }

    printf("Decomposing the number: %d\n", number);


    while (number > 0) {

        digitCount = number % 10;

        if (digitCount != 0) {
            printf("No. of %ds = %d\n", place, digitCount);
        }


        number /= 10;


        place *= 10;
    }
}

int main() {
    int num;

    printf("Enter a number: ");
    scanf("%d", &num);

    decomposeNumber(num);

    return 0;
}
