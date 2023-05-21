# Online Card Distribution

A programming test on randomly card distribution among the players.

## Theme
Playing cards will be given out to n(number) people.

## Purpose
Total 52 cards containing 1-13 of each Spade(S), Heart(H), Diamond(D), Club(C) will be given to n people randomly.

## Recommended Requirements
- PHP 7.0 or above

## Program Architectures
- PHP
- HTML5
- CSS
- Javascript + jQuery
- Bootstrap Template V4.6

## Program Input

a. Number of people (numerical value)
b. It does not matter how cards are given if recompile of program arguments, parameter, keyboard input and so on are not necessary.
c. In case input value is nil or value is invalid then the error message of “Input value does not exist or value is invalid” must be displayed and the process must be terminated.
d. Any number less than 0 is an invalid value.
e. Greater than 53 are normal values and cards must be distributed to a number of people instead of having it as an error.

## Program Sample Output

**No of people: 1**
**Output:**
```
D-6,S-3,S-8,H-J,C-9,C-8,C-4,S-2,H-7,C-X,H-2,H-3,D-K,C-K,S-6,H-X,D-A,S-X,D-9,D-J,H-A,C-Q,D-5,D-8,D-4,H-6,C-5,D-3,H-4,S-J,S-Q,S-5,S-9,H-8,H-Q,H-K,S-7,C-6,C-2,C-A,D-2,H-5,C-3,S-4,D-7,S-K,D-Q,C-7,H-9,S-A,C-J,D-X,
```

**No of people: 4**
**Output:**
```
C-3,D-J,S-6,H-2,D-2,D-8,D-9,D-3,S-Q,C-6,C-K,C-Q,H-8,
D-6,C-A,H-K,S-3,D-K,C-5,S-7,S-2,H-3,S-9,H-6,C-4,H-X,
H-J,S-X,S-J,D-4,C-8,C-7,S-8,S-4,D-5,D-A,H-9,D-7,S-5,
C-2,H-4,D-X,H-5,S-A,C-J,D-Q,C-X,S-K,H-Q,H-7,C-9,H-A,
```

**No of people: 10**
**Output:**
```
H-6,C-Q,S-X,H-A,H-Q,D-K,
S-2,H-5,S-4,C-4,S-Q,S-3,
D-Q,H-9,C-6,S-6,D-J,,
H-7,H-J,D-8,C-2,H-4,,
D-2,C-3,D-9,C-K,S-5,,
H-K,C-A,C-7,D-4,D-7,,
H-X,S-9,D-5,D-6,C-J,,
D-X,S-8,S-K,C-X,H-3,,
D-3,D-A,C-8,S-J,C-9,,
C-5,S-7,H-8,H-2,S-A,,
```

**No of people: 55**
**Output:**
```
S-6,
C-Q,
H-Q,
S-4,
H-6,
H-J,
C-4,
S-J,
D-5,
D-3,
C-A,
H-K,
H-A,
S-K,
D-4,
H-8,
C-5,
C-2,
S-3,
S-2,
D-9,
H-5,
S-7,
C-J,
H-9,
C-9,
H-3,
D-X,
D-2,
S-X,
H-X,
C-3,
S-9,
C-X,
S-8,
D-K,
D-J,
C-7,
H-4,
D-6,
H-2,
S-A,
S-5,
S-Q,
C-6,
H-7,
C-K,
D-8,
D-A,
D-Q,
D-7,
C-8,
,
,
,
```