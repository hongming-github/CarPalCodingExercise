# CarPalCodingExercise

## 1.Program output:  
Input:[[5,2][8,1][6,4][10][0,5][2,6][8,1][5,3][6,1][10,2,6]]  
Output:[7,16,26,41,46,54,63,71,78,96]  

Input:[[5,2][8,1][1,3][2,3][0,5][2,6][8,1][5,3][6,1][2,6]]  
Output:[7,16,20,25,30,38,47,55,62,70]  

Input:[[10][10][10][10][0,5][2,6][8,1][10][10][10,2,5]]  
Output:[30,60,85,100,105,113,122,159,186,203]  

## 2.How to test:  
Since the main problem for this program is this  
if (`$current_score === 10 && $index < 2 && $frame < count($input) - 1`) condition.  
There are total 8 possibilities:  
1. `$current_score === 10 && $index < 2 && $frame < count($input) - 1`  
2. `$current_score === 10 && $index < 2 && $frame >= count($input) - 1`  
3. `$current_score === 10 && $index >= 2 && $frame < count($input) - 1`  
4. `$current_score === 10 && $index >= 2 && $frame >= count($input) - 1`  
5. `$current_score !== 10 && $index < 2 && $frame < count($input) - 1`  
6. `$current_score !== 10 && $index < 2 && $frame >= count($input) - 1`  
7. `$current_score !== 10 && $index >= 2 && $frame < count($input) - 1`  
8. `$current_score !== 10 && $index >= 2 && $frame >= count($input) - 1`  
The case 4, 7, 8 will never appear, so as long as the test data can cover case 1, 2, 3, 5, 6 the result should be correct.  
