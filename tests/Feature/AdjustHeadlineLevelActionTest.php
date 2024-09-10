<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\Actions\AdjustHeadlineLevelAction;

it('returns null when markdown is null', function () {
    $adjustHeadline = new AdjustHeadlineLevelAction;
    expect($adjustHeadline(null, 2))->toBeNull();
});

it('adjusts headline levels based on max level', function () {
    $markdown = "# Heading\n## Subheading\n### Third level";
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 2);

    expect($adjusted)
        ->toContain('## Heading')
        ->toContain('### Subheading')
        ->toContain('#### Third level');
});

it('does not adjust levels if max level is already reached', function () {
    $markdown = "## Heading\n### Subheading\n#### Third level";
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 3);

    expect($adjusted)
        ->toContain('## Heading')
        ->toContain('### Subheading')
        ->toContain('#### Third level');
});

it('does adjust levels on multiline string h3', function () {
    $markdown = '# Title of the Document

## Table of Contents
1. [Introduction](#introduction)
2. [Section 1](#section-1)
   - [Subsection 1.1](#subsection-11)
   - [Subsection 1.2](#subsection-12)
3. [Section 2](#section-2)
   - [Subsection 2.1](#subsection-21)
   - [Subsection 2.2](#subsection-22)
4. [Conclusion](#conclusion)

---

## Introduction

This document provides an overview of **key topics** related to XYZ. Here, we will explore various sections that address specific aspects of this subject.

## Section 1: Overview of XYZ

### Subsection 1.1: History of XYZ

The history of XYZ dates back to...

> **Tip**: Use blockquotes to highlight important tips or notes.
';
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 3);

    expect($adjusted)
        ->toContain('### Title of the Document')
        ->toContain('#### Table of Contents')
        ->toContain('#### Introduction')
        ->toContain('#### Section 1: Overview of XYZ')
        ->toContain('##### Subsection 1.1: History of XYZ');
});

it('does adjust levels on multiline string h2', function () {
    $markdown = '# Title of the Document

## Table of Contents
1. [Introduction](#introduction)
2. [Section 1](#section-1)
   - [Subsection 1.1](#subsection-11)
   - [Subsection 1.2](#subsection-12)
3. [Section 2](#section-2)
   - [Subsection 2.1](#subsection-21)
   - [Subsection 2.2](#subsection-22)
4. [Conclusion](#conclusion)

---

## Introduction

This document provides an overview of **key topics** related to XYZ. Here, we will explore various sections that address specific aspects of this subject.

## Section 1: Overview of XYZ

### Subsection 1.1: History of XYZ

The history of XYZ dates back to...

> **Tip**: Use blockquotes to highlight important tips or notes.
';
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 2);

    expect($adjusted)
        ->toContain('## Title of the Document')
        ->toContain('### Table of Contents')
        ->toContain('### Introduction')
        ->toContain('### Section 1: Overview of XYZ')
        ->toContain('#### Subsection 1.1: History of XYZ');
});

it('does adjust levels on multiline string h1', function () {
    $markdown = '# Title of the Document

## Table of Contents
1. [Introduction](#introduction)
2. [Section 1](#section-1)
   - [Subsection 1.1](#subsection-11)
   - [Subsection 1.2](#subsection-12)
3. [Section 2](#section-2)
   - [Subsection 2.1](#subsection-21)
   - [Subsection 2.2](#subsection-22)
4. [Conclusion](#conclusion)

---

## Introduction

This document provides an overview of **key topics** related to XYZ. Here, we will explore various sections that address specific aspects of this subject.

## Section 1: Overview of XYZ

### Subsection 1.1: History of XYZ

The history of XYZ dates back to...

> **Tip**: Use blockquotes to highlight important tips or notes.
';
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 1);

    expect($adjusted)
        ->toContain('# Title of the Document')
        ->toContain('## Table of Contents')
        ->toContain('## Introduction')
        ->toContain('## Section 1: Overview of XYZ')
        ->toContain('### Subsection 1.1: History of XYZ');
});
