<?php
/**
 * What are namespaces? In the broadest definition namespaces are a way of
 * encapsulating items. This can be seen as an abstract concept in many places.
 * For example, in any operating system directories serve to group related
 * files, and act as a namespace for the files within them.
 *
 * So, what are they? In essence a namespace is a bucket in which you can place
 * your classes, functions and variables. Within a namespace you can access
 * these items without qualification. From outside, you must either import the
 * namespace, or reference it, in order to access the items it contains.
 * In the PHP world, namespaces are designed to solve two problems that authors of
 * libraries and applications encounter when creating re-usable code elements such
 * as classes or functions:
 *
 * In the PHP world, namespaces are designed to solve two problems that authors
 * of libraries and applications encounter when creating re-usable code
 * elements such as classes or functions:
 * 
 * 1.Name collisions between code you create, and internal PHP
 * classes/functions/constants or third-party classes/functions/constants.
 * 2.Ability to alias (or shorten) Extra_Long_Names designed to alleviate the
 *   first problem, improving readability of source code.
 *
 * Although any valid PHP code can be contained within a namespace, only four
 * types of code are affected by namespaces: classes, interfaces, functions and
 * constants. 
 *
 * Namespaces are declared using the namespace keyword. A file containing a
 * namespace must declare the namespace at the top of the file before any other
 * code - with one exception: the declare keyword. 
 */
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

/**
 * Much like directories and files, PHP namespaces also contain the ability to
 * specify a hierarchy of namespace names. Thus, a namespace name can be
 * defined with sub-levels:
 */
namespace MyProject_2 {

const CONNECT_OK = 2;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

namespace {

echo \MyProject\CONNECT_OK;
echo \MyProject_2\CONNECT_OK;
}
