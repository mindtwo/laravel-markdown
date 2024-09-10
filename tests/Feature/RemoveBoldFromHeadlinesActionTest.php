<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\Actions\RemoveBoldFromHeadlinesAction;

it('returns null when markdown is null', function () {
    $removeBold = new RemoveBoldFromHeadlinesAction;
    expect($removeBold(null))->toBeNull();
});

it('removes bold from headlines', function () {
    $markdown = "# **Bold Heading**\nSome text.";
    $removeBold = new RemoveBoldFromHeadlinesAction;

    $cleaned = $removeBold($markdown);

    expect($cleaned)
        ->not()->toContain('**')
        ->toContain('# Bold Heading');
});

it('does not remove bold from regular text', function () {
    $markdown = "# Heading\nSome **bold** text.";
    $removeBold = new RemoveBoldFromHeadlinesAction;

    $cleaned = $removeBold($markdown);

    expect($cleaned)
        ->toContain('**bold**')
        ->toContain('# Heading');
});

it('does adjust levels on multiline string h2', function () {
    $markdown = '# **Title of the Document**

## **Table of Contents**
1. [Introduction](#introduction)
2. [Section 1](#section-1)
   - [Subsection 1.1](#subsection-11)
   - [Subsection 1.2](#subsection-12)
3. [Section 2](#section-2)
   - [Subsection 2.1](#subsection-21)
   - [Subsection 2.2](#subsection-22)
4. [Conclusion](#conclusion)

---

## **Introduction
TEST


This document **provides** an overview of **key topics** related to XYZ. Here, we will explore various sections that address specific aspects of this subject.

## **Section 1: Overview of XYZ**

### 1. **Subsection 1.1: History of XYZ**

The history of XYZ dates back to...

### 2. **Subsection 1.2: History of XYZ**

The history of XYZ dates back to...

> **Tip**: Use blockquotes to highlight important tips or notes.
';
    $adjustHeadline = new RemoveBoldFromHeadlinesAction;

    $adjusted = $adjustHeadline($markdown, 2);

    expect($adjusted)
        ->toContain('# Title of the Document')
        ->toContain('## Table of Contents')
        ->toContain('## Introduction')
        ->toContain('## Section 1: Overview of XYZ')
        ->toContain('### 1. Subsection 1.1: History of XYZ')
        ->toContain('### 2. Subsection 1.2: History of XYZ');
});
