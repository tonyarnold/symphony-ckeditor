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
 * **All other plugins are removed!**; if you wish to make use of more functionality, download the original version of [CKEditor](http://ckeditor.com) and extract the plugins needed from their package.
 * **All languages other then English are removed!**; if you wish to have additional languages, download the original version of [CKEditor](http://ckeditor.com) and extract the languages needed from their package.

## Built-in file browser

The editor comes with a built-in file browser which uses sections to get their files from. This works as follows:

 * Make sure you have created a section for your uploaded files ('Downloads' is a good name), with a 'File Upload' field attached;
 * Select the new section in your preferences panel to be available for CKEditor.
 * Now if you use the 'browse server'-button in CKEditor, you can select your section and the specific entry/file to insert in your text. You can also add new entries with the file manager on the fly!