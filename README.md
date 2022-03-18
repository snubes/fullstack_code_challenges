[![ci](https://github.com/ahmad-azizi-dev/fullstack_code_challenges/actions/workflows/ci.yml/badge.svg?branch=refactor)](https://github.com/ahmad-azizi-dev/fullstack_code_challenges/actions/workflows/ci.yml)

## Code challenge

Refactoring and implementation of SOLID and some design patterns.

### Requirements

---

- docker
- docker compose
- make

### Run

---

### For **run** use this command:

`make run`

You should see an output similar to:
```shell
1
2
1
2
```
### For run **tests** use this command:

`make test`

You should see an output similar to:
```shell
PHPUnit 9.5.19

Runtime:       PHP 8.0.16       
Configuration: /app/phpunit.xml 

...................                                               19 / 19 (100%)

Time: 00:00.062, Memory: 6.00 MB

OK (19 tests, 37 assertions)

```
### For SSH into the app running container use this command:

`make ssh_container`