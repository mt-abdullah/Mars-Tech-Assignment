#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdlib.h>


int check_password(char *password) {
    int score = 0;
    int length = strlen(password);


    if (length >= 8) {
        score++;
    } else {
        return 0;
    }

    int has_upper = 0;
    for (int i = 0; i < length; i++) {
        if (isupper(password[i])) {
            has_upper = 1;
            break;
        }
    }
    if (has_upper) score++;

    int lowercase_count = 0;
    for (int i = 0; i < length; i++) {
        if (islower(password[i])) {
            lowercase_count++;
        }
    }
    if (lowercase_count >= 3) score++;


    int has_symbol = 0;
    for (int i = 0; i < length; i++) {
        if (ispunct(password[i])) {
            has_symbol = 1;
            break;
        }
    }
    if (has_symbol) score++;

    int digit_count = 0;
    int last_digit = -1;
    int sequential = 0;
    for (int i = 0; i < length; i++) {
        if (isdigit(password[i])) {
            int digit = password[i] - '0';
            digit_count++;
            if (last_digit != -1 && abs(digit - last_digit) == 1) {
                sequential++;
            } else {
                sequential = 0;
            }
            last_digit = digit;
        }
    }
    if (digit_count >= 3 && sequential < 2) score++;


    return score;
}


int main() {
    char password[50];
    printf("Enter your password: ");
    scanf("%s", password);


    int rank = check_password(password);


    if (rank == 0) {
        printf("Weakest password.\n");
    } else if (rank <= 3) {
        printf("Weak password.\n");
    } else if (rank <= 5) {
        printf("Average password.\n");
    } else if (rank <= 7) {
        printf("Medium password.\n");
    } else if (rank == 8) {
        printf("Strong password.\n");
    } else if (rank == 9) {
        printf("Strongest password.\n");
    }

    return 0;
}
