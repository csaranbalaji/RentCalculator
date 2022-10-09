# RentCalculator
A basic rent calculator which is used for managing accounts for tenants and generating rent recipts. 

## Features
- Add and remove tenants on the go.
- Rename tenants when they change.
- EB reading entry and hassle-free calculations.
- Generate summary with monthly calculations.

## Database Structure

`mysql> use rent;`

`mysql> show tables;`

| Tables_in_rent |
|:--------------:|
| Tenants        |
| EB             |

### Tenants
`mysql> desc Tenants;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| Name  | char(15) | YES  |     | NULL    |       |
| Rent  | int(11)  | YES  |     | NULL    |       |
| Num   | int(11)  | NO   | PRI | 0       |       |

### EB
`mysql> desc EB;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| Num   | int(11) | NO   | PRI | 0       |       |
| m1    | int(11) | YES  |     | NULL    |       |
| m2    | int(11) | YES  |     | NULL    |       |
| m3    | int(11) | YES  |     | NULL    |       |
| m4    | int(11) | YES  |     | NULL    |       |
| m5    | int(11) | YES  |     | NULL    |       |
| m6    | int(11) | YES  |     | NULL    |       |
| m7    | int(11) | YES  |     | NULL    |       |
| m8    | int(11) | YES  |     | NULL    |       |
| m9    | int(11) | YES  |     | NULL    |       |
| m10   | int(11) | YES  |     | NULL    |       |
| m11   | int(11) | YES  |     | NULL    |       |
| m12   | int(11) | YES  |     | NULL    |       |

## Screenshots
![image](https://user-images.githubusercontent.com/56619570/138549818-7eda4fe8-3ee5-4ee9-8a52-1fc6c0762804.png)

## Contributers
- [Saran Balaji C](https://github.com/csaranbalaji)
- [jcsekar](https://github.com/jcsekar)

