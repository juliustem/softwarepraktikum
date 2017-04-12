
args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
library(cluster)
library(genefilter)
library(affy)
library(affycomp)
library(affydata)
library(affyio)
library(simpleaffy)
library(sm)
library(BH)
library(bioDist)
library(MVA)
library(qcc)
library(made4)
library(ade4)

Data2 <- ReadAffy()

setwd("..")

setwd("output")
png(filename="qualitycontrol.png")
plot.qc.stats(qc(Data2))
title(main="Quality Control")


dev.off()


