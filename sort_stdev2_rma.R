args <- commandArgs(TRUE)
R <- args[1]
N <- args[2]
Z <- args[3]

library(dplyr)
V <- strtoi(N)
setwd(Z)

tab <- read.table("FC_SLR_rma.txt", header = TRUE, row.names=NULL)
names(tab)[names(tab)=="row.names"] <- "GeneID"

if(R=="<="){
  temptab <- dplyr::filter(tab,Stdabw_G2<=(V))
  sorttab <- temptab[order(temptab$Stdabw_G2, decreasing = TRUE), ]
  s <- paste0("Stdabw_G2_<=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="<"){
  temptab <- dplyr::filter(tab,Stdabw_G2<(V))
  sorttab <- temptab[order(temptab$Stdabw_G2, decreasing = TRUE), ]
  s <- paste0("Stdabw_G2_<",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">="){
  temptab <- dplyr::filter(tab,Stdabw_G2>=(V))
  sorttab <- temptab[order(temptab$Stdabw_G2, decreasing = TRUE), ]
  s <- paste0("Stdabw_G2_>=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">"){
  temptab <- dplyr::filter(tab,Stdabw_G2>(V))
  sorttab <- temptab[order(temptab$Stdabw_G2, decreasing = TRUE), ]
  s <- paste0("Stdabw_G2_>",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="max"){
  temptab <- dplyr::top_n(tab,V,Stdabw_G2)
  sorttab <- temptab[order(temptab$Stdabw_G2, decreasing = TRUE), ]
  s <- paste0("Stdabw_G2_max_Top",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="min"){
  temptab <- tab[order(tab$Stdabw_G2), ]
  sorttab <- temptab[1:V,]
  s <- paste0("Stdabw_G2_min_Top",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

