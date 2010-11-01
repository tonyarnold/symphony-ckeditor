# CKEditor for Symphony CMS

 * Version: 1.0
 * CKEditor version: 3.4.1
 * Date: 01-11-2010
 * Authors: Tony Arnold <tony@thecocoabots.com>
 * Repository: <http://github.com/tonyarnold/symphony-ckeditor/>
 * Requirements: Symphony CMS 2.1.0 or higher <http://github.com/symphony/symphony-2/tree/master>

## Introduction

This extension provides [CKEditor](http://ckeditor.com/) as text-formatter for Symphony CMS. It also has an integrated file browser which uses Symphony sections to get it's files from.
For further information about the editor please visit [www.ckeditor.com](http://ckeditor.com/).

It is based upon code found in [Nils H&ouml;rrmann's WYMEditor](http://github.com/nilshoerrmann/wymeditor).

## Contributors

Significant work and bug fixes have been contributed by the following users:

 * Giel Berkers - <http://github.com/kanduvisla> contributed major clean-ups and a new Symphony file browser that is compatible with CKEditor;
 * Rob Stanford - contributed bug fixes.
 
For full details, please see the Github commit log - <http://github.com/tonyarnold/symphony-ckeditor/commits/master>.

## Special notes

The version of CKEditor is stripped down to the bare essentials. This means:

 * Text formatting is limited to the following functionality:
   * Paragraph Format
   * Bold
   * Italic
   * Strike-through
   * Subscript / Superscript
   * Ordered list / Unordered list
   * Indent / Outdent
   * Block quote
   * Hyperlinks
   * Horizontal rule
   * View source
   * Full screen
 * *Most of CKEditor's plug-ins have been removed*: if you wish to add more plug-ins, please download the original [CKEditor](http://ckeditor.com) package and extract the plugins you'd like to include.
 * *All languages other than US English are removed*: If you wish to make use of additional languages, please download the original version of [CKEditor](http://ckeditor.com) and extract the languages you'd like to include.

## Built-in file browser

The editor comes with a built-in file browser which uses sections to get their files from. This works as follows:

 * Make sure you have created a section for your uploaded files ('Downloads' is a good name), with a 'File Upload' field attached;
 * Got to Symphony's System Preferences to make the CKEditor file browser available to your new section, and any existing sections.
 * Once you've enabled the file browser for your section, any time you make use of the 'Browse Server' button in CKEditor, you can select existing files from your available sections and add them to the entry you are editing. You can also upload new files using the file browser on the fly!