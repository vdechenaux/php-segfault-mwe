# php-segfault-mwe

https://bugs.php.net/bug.php?id=75899

## Platform
```
$ lsb_release -a               
No LSB modules are available.
Distributor ID:	Ubuntu
Description:	Ubuntu 16.04.3 LTS
Release:	16.04
Codename:	xenial
```

## PHP 7.2
```
$ php7.2 -v
PHP 7.2.1-1+ubuntu16.04.1+deb.sury.org+1 (cli) (built: Jan  5 2018 13:54:13) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2017 Zend Technologies
    with Zend OPcache v7.2.1-1+ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2017, by Zend Technologies
```

```
$ php7.2 segfault.php
PHP Fatal error:  Allowed memory size of 268435456 bytes exhausted (tried to allocate 268435488 bytes) in /tmp/php-segfault-mwe/segfault.php on line 13
[1]    10727 segmentation fault (core dumped)  php7.2 segfault.php
```

### Backtrace

Top
```
#0  0x00005555557ef129 in zend_is_callable_check_func (check_flags=check_flags@entry=0, fcc=fcc@entry=0x7fffff7ff160, strict_class=0, error=0x7fffff7ff150, callable=<optimized out>)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_API.c:3074
#1  0x00005555557f6274 in zend_is_callable_impl (error=0x7fffff7ff150, fcc=0x7fffff7ff160, check_flags=0, object=0x0, callable=<optimized out>)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_API.c:3412
#2  zend_is_callable_ex (callable=callable@entry=0x7fffe40e0b00, object=object@entry=0x0, check_flags=check_flags@entry=0, callable_name=callable_name@entry=0x0, 
    fcc=fcc@entry=0x7fffff7ff160, error=error@entry=0x7fffff7ff150) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_API.c:3460
#3  0x00005555557f657c in zend_fcall_info_init (callable=callable@entry=0x7fffe40e0b00, check_flags=check_flags@entry=0, fci=fci@entry=0x7fffff7ff190, fcc=fcc@entry=0x7fffff7ff160, 
    callable_name=callable_name@entry=0x0, error=error@entry=0x7fffff7ff150) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_API.c:3501
#4  0x000055555571a629 in zend_parse_arg_func (error=0x7fffff7ff150, check_null=0, dest_fcc=0x7fffff7ff160, dest_fci=0x7fffff7ff190, arg=0x7fffe40e0b00)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_API.h:1296
#5  zif_call_user_func (execute_data=0x7fffe40e0ab0, return_value=0x7fffff7ff260) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4873
#6  0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#7  execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#8  0x00005555557de0e2 in zend_call_function (fci=0x7fffe40e0960, fci@entry=0x7fffff7ff400, fci_cache=fci_cache@entry=0x7fffff7ff3d0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#9  0x000055555571a668 in zif_call_user_func (execute_data=0x7fffe40e0430, return_value=0x7fffff7ff4d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#10 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#11 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#12 0x00005555557de0e2 in zend_call_function (fci=0x7fffe40e02e0, fci@entry=0x7fffff7ff670, fci_cache=fci_cache@entry=0x7fffff7ff640)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#13 0x000055555571a668 in zif_call_user_func (execute_data=0x7fffe40dfdb0, return_value=0x7fffff7ff740) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#14 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#15 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#16 0x00005555557de0e2 in zend_call_function (fci=0x7fffe40dfc60, fci@entry=0x7fffff7ff8e0, fci_cache=fci_cache@entry=0x7fffff7ff8b0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#17 0x000055555571a668 in zif_call_user_func (execute_data=0x7fffe40df730, return_value=0x7fffff7ff9b0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#18 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#19 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#20 0x00005555557de0e2 in zend_call_function (fci=0x7fffe40df5e0, fci@entry=0x7fffff7ffb50, fci_cache=fci_cache@entry=0x7fffff7ffb20)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#21 0x000055555571a668 in zif_call_user_func (execute_data=0x7fffe40df0b0, return_value=0x7fffff7ffc20) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#22 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#23 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#24 0x00005555557de0e2 in zend_call_function (fci=0x7fffe40def60, fci@entry=0x7fffff7ffdc0, fci_cache=fci_cache@entry=0x7fffff7ffd90)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#25 0x000055555571a668 in zif_call_user_func (execute_data=0x7fffe40dea30, return_value=0x7fffff7ffe90) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
...
```

Bottom
```
...
#53665 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341f4e0, return_value=0x7fffffffad70) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53666 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53667 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53668 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341f390, fci@entry=0x7fffffffaf10, fci_cache=fci_cache@entry=0x7fffffffaee0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53669 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341ee60, return_value=0x7fffffffafe0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53670 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53671 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53672 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341ed10, fci@entry=0x7fffffffb180, fci_cache=fci_cache@entry=0x7fffffffb150)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53673 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341e7e0, return_value=0x7fffffffb250) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53674 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53675 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53676 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341e690, fci@entry=0x7fffffffb3f0, fci_cache=fci_cache@entry=0x7fffffffb3c0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53677 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341e160, return_value=0x7fffffffb4c0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53678 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53679 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53680 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341e010, fci@entry=0x7fffffffb660, fci_cache=fci_cache@entry=0x7fffffffb630)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53681 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341dae0, return_value=0x7fffffffb730) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53682 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53683 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53684 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341d990, fci@entry=0x7fffffffb8d0, fci_cache=fci_cache@entry=0x7fffffffb8a0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53685 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341d460, return_value=0x7fffffffb9a0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53686 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53687 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53688 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341d310, fci@entry=0x7fffffffbb40, fci_cache=fci_cache@entry=0x7fffffffbb10)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53689 0x000055555571a668 in zif_call_user_func (execute_data=0x7ffff341cde0, return_value=0x7fffffffbc10) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:4879
#53690 0x000055555589d485 in ZEND_DO_FCALL_BY_NAME_SPEC_RETVAL_UNUSED_HANDLER () at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:738
#53691 execute_ex (ex=0x7ffff349e7d0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_vm_execute.h:59746
#53692 0x00005555557de0e2 in zend_call_function (fci=0x7ffff341cc90, fci@entry=0x7fffffffbd60, fci_cache=0x7fffffffbc90, fci_cache@entry=0x0)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:817
#53693 0x00005555557de505 in _call_user_function_ex (object=object@entry=0x0, function_name=<optimized out>, retval_ptr=retval_ptr@entry=0x7fffffffbdb0, param_count=<optimized out>, 
    params=<optimized out>, no_separation=no_separation@entry=1) at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_execute_API.c:652
#53694 0x000055555571af15 in user_shutdown_function_call (zv=<optimized out>) at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:5023
#53695 0x0000555555800c3c in zend_hash_apply (ht=0x7ffff34cd070, apply_func=apply_func@entry=0x55555571aed0 <user_shutdown_function_call>)
    at /build/php7.2-MkLDxZ/php7.2-7.2.1/Zend/zend_hash.c:1506
#53696 0x000055555571ee76 in php_call_shutdown_functions () at /build/php7.2-MkLDxZ/php7.2-7.2.1/ext/standard/basic_functions.c:5107
---Type <return> to continue, or q <return> to quit---
#53697 0x00005555557887a5 in php_request_shutdown (dummy=<optimized out>) at /build/php7.2-MkLDxZ/php7.2-7.2.1/main/main.c:1846
#53698 0x00005555558a15ac in do_cli (argc=2, argv=0x555555c292e0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/sapi/cli/php_cli.c:1178
#53699 0x000055555563edec in main (argc=2, argv=0x555555c292e0) at /build/php7.2-MkLDxZ/php7.2-7.2.1/sapi/cli/php_cli.c:1404
```

## PHP 7.1
```
$ php7.1 -v
PHP 7.1.13-1+ubuntu16.04.1+deb.sury.org+1 (cli) (built: Jan  5 2018 13:26:45) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
    with Zend OPcache v7.1.13-1+ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2017, by Zend Technologies
```

```
$ php7.1 segfault.php
PHP Fatal error:  Allowed memory size of 268435456 bytes exhausted (tried to allocate 268435488 bytes) in /tmp/php-segfault-mwe/segfault.php on line 13
[1]    10692 segmentation fault (core dumped)  php7.1 segfault.php
```

## PHP 7.0
```
$ php7.0 -v
PHP 7.0.27-1+ubuntu16.04.1+deb.sury.org+1 (cli) (built: Jan  5 2018 14:12:46) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.0.0, Copyright (c) 1998-2017 Zend Technologies
    with Zend OPcache v7.0.27-1+ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2017, by Zend Technologies
```

```
$ php7.0 segfault.php 
PHP Fatal error:  Allowed memory size of 268435456 bytes exhausted (tried to allocate 268435488 bytes) in /tmp/php-segfault-mwe/segfault.php on line 13
[1]    10648 segmentation fault (core dumped)  php7.0 segfault.php
```
